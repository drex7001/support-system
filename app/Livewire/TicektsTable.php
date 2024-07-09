<?php

namespace App\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Ticket;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;

class TicektsTable extends DataTableComponent
{
    protected $model = Ticket::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setTableRowUrl(function ($row) {
                return route('tickets.show', $row->reference_number);
            });
        $this->setSearchStatus(true);
        // $this->setSearchPlaceholder('Enter Customer Name, Email, Phone number, Reference number');


        $this->setFiltersStatus(true);
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Customer name", "customer_name")
                ->sortable()
                ->searchable(),
            Column::make("Problem description", "problem_description")
                ->sortable(),
            Column::make("Email", "email")
                ->sortable()
                ->searchable(),
            Column::make("Phone number", "phone")
                ->sortable()
                ->searchable(),
            Column::make("Reference number", "reference_number")
                ->sortable()
                ->searchable(),
            Column::make("Status", "status")
                ->sortable(),
            Column::make("Created at", "created_at")
                ->sortable(),
            Column::make("Updated at", "updated_at")
                ->sortable(),
        ];
    }

    public function builder(): Builder
    {
        return Ticket::query()
            ->when($this->getAppliedFilterWithValue('status'), fn ($query, $status) => $query->where('status', $status === 'open'));
    }

    public function filter(): array
    {
        return [
            // SelectFilter::make('Status')
            //     ->options([
            //         '' => 'All',
            //         'open' => 'Open',
            //         'close' => 'Close',
            //     ]),

            SelectFilter::make('Status')
                ->options([
                    '' => 'All',
                    'open' => 'Open',
                    'close' => 'Close',
                ])
                ->filter(function (Builder $builder, string $value) {
                    if ($value === 'open') {
                        $builder->where('status', 'open');
                    } elseif ($value === 'close') {
                        $builder->where('status', 'close');
                    }
                }),
        ];
    }
}
