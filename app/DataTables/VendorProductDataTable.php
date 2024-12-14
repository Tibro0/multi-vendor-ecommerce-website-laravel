<?php

namespace App\DataTables;

use App\Models\Product;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class VendorProductDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
        ->addColumn('action', function($query){
            $editBtn = "<a href='".route('vendor.products.edit', $query->id)."' class='btn btn-primary'><i class='far fa-edit'></i><a/>";
            $deleteBtn = "<a href='".route('vendor.products.destroy', $query->id)."' id='delete' class='btn btn-danger ms-2'><i class='far fa-trash-alt'></i><a/>";
            $galleryBtn = "<a href='".route('vendor.products-image-gallery.index', ['product' => $query->id])."' title='Image Gallery' class='btn btn-success ms-2'><i class='fas fa-images'></i><a/>";

            $productVariantBtn = "<a href='".route('vendor.products-variant.index', ['product' => $query->id])."' title='Product Variant' class='btn btn-dark ms-2'><i class='fab fa-product-hunt'></i><a/>";

            return $editBtn.$deleteBtn.$galleryBtn.$productVariantBtn;
        })
        ->addColumn('image', function($query){
            return "<img width='70px' src='".asset($query->thumb_image)."'></img>";
        })
        ->addColumn('type', function($query){
            if ($query->product_type == 'new_arrival') {
                return '<i class="badge bg-success">New Arrival</i>';
            }elseif ($query->product_type == 'featured_product') {
                return '<i class="badge bg-warning">Featured Product</i>';
            }elseif ($query->product_type == 'top_product') {
                return '<i class="badge bg-info">Top Product</i>';
            }elseif ($query->product_type == 'best_product') {
                return '<i class="badge bg-danger">Best Product</i>';
            }else {
                return '<i class="badge bg-dark">None</i>';
            }
        })
        ->addColumn('status', function($query){
            if ($query->status == 1) {
                  $button = '<div class="form-check form-switch">
                    <input class="form-check-input change-status" checked type="checkbox" id="flexSwitchCheckDefault" data-id="'.$query->id.'" style="width: 50px !important; height: 20px !important;">
                    </div>';
            }else {
                  $button = '<div class="form-check form-switch">
                    <input class="form-check-input change-status" type="checkbox" id="flexSwitchCheckDefault" data-id="'.$query->id.'" style="width: 50px !important; height: 20px !important;">
                    </div>';
            }
                return $button;
        })
        ->addColumn('approved', function($query){
            if ($query->is_approved === 1) {
                return '<i class="badge bg-success">Approved</i>';
            }elseif ($query->is_approved === 0) {
                return '<i class="badge bg-danger">Pending</i>';
            }
        })
        ->rawColumns(['image', 'type', 'status', 'action', 'approved'])
        ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Product $model): QueryBuilder
    {
        return $model->where('vendor_id', Auth::user()->vendor->id)->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('vendorproduct-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(0)
                    ->selectStyleSingle()
                    ->buttons([
                        Button::make('excel'),
                        Button::make('csv'),
                        Button::make('pdf'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('id'),
            Column::make('image'),
            Column::make('name'),
            Column::make('price'),
            Column::make('approved'),
            Column::make('type')->width(200),
            Column::make('status')->width(100),
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(250)
                  ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'VendorProduct_' . date('YmdHis');
    }
}
