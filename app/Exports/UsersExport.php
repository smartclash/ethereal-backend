<?php

namespace App\Exports;

use App\Enums\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class UsersExport implements FromQuery, ShouldAutoSize, WithHeadings, WithMapping
{
    /**
     * Filter only the paid users out
     *
     * @var bool
     */
    private bool $paid;

    /**
     * Filter only KCG students
     *
     * @var bool
     */
    private bool $kcgOnly;

    public function __construct($paid = false, $kcgOnly = false)
    {
        $this->paid = $paid;
        $this->kcgOnly = $kcgOnly;
    }

    public function headings(): array
    {
        return [
            'Name',
            'Email',
            'Phone',
            'Paid',
            'College',
            'Course',
            'Passing Year'
        ];
    }

    /**
     * @return Builder
     */
    public function query(): Builder
    {
        return User::query()
            ->select(['id', 'name', 'email', 'phone', 'role'])
            ->where('role', Role::PARTICIPANT)
            ->whereHas('details')
            ->with(['details:user_id,college,course,passing', 'razorpay:user_id,paid'])
            ->when($this->paid, fn (Builder $builder) =>
                $builder->whereRelation('razorpay', 'paid', $this->paid)
            )
            ->when($this->kcgOnly, fn (Builder $builder) =>
                $builder->whereRelation('details', 'college', 'like', '%kcg%')
            );
    }

    /**
     * @return array
     * @var User $user
     */
    public function map($user): array
    {
        return [
            $user->name,
            $user->email,
            $user->phone,
            (bool) $user->razorpay->paid,
            $user->details->college,
            $user->details->course,
            $user->details->passing,
        ];
    }
}
