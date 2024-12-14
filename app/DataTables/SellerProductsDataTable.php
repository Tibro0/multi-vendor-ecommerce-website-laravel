<?php

namespace App\DataTables;

use App\Models\Product;
use App\Models\SellerProduct;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class SellerProductsDataTable extends DataTable
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
            $editBtn = "<a href='".route('admin.products.edit', $query->id)."' class='btn btn-primary'><i class='far fa-edit'></i><a/>";
            $deleteBtn = "<a href='".route('admin.products.destroy', $query->id)."' id='delete' class='btn btn-danger ml-2'><i class='far fa-trash-alt'></i><a/>";
            $galleryBtn = "<a href='".route('admin.products-image-gallery.index', ['product' => $query->id])."' title='Image Gallery' class='btn btn-success ml-2'><i class='fas fa-images'></i><a/>";

            $productVariantBtn = "<a href='".route('admin.products-variant.index', ['product' => $query->id])."' title='Product Variant' class='btn btn-dark ml-2'><i class='fab fa-product-hunt'></i><a/>";

            return $editBtn.$deleteBtn.$galleryBtn.$productVariantBtn;
        })
        ->addColumn('image', function($query){
            return "<img width='70px' src='".asset($query->thumb_image)."'></img>";
        })
        ->addColumn('type', function($query){
            if ($query->product_type == 'new_arrival') {
                return '<i class="badge badge-success">New Arrival</i>';
            }elseif ($query->product_type == 'featured_product') {
                return '<i class="badge badge-warning">Featured Product</i>';
            }elseif ($query->product_type == 'top_product') {
                return '<i class="badge badge-info">Top Product</i>';
            }elseif ($query->product_type == 'best_product') {
                return '<i class="badge badge-danger">Best Product</i>';
            }else {
                return '<i class="badge badge-dark">None</i>';
            }
        })
        ->addColumn('status', function($query){
            if ($query->status == 1) {
                $button = '<label class="custom-switch">
                    <input type="checkbox" checked name="custom-switch-checkbox" data-id="'.$query->id.'" class="custom-switch-input change-status">
                    <span class="custom-switch-indicator"></span>
                  </label>';
            }else {
                $button = '<label class="custom-switch">
                    <input type="checkbox" name="custom-switch-checkbox" data-id="'.$query->id.'" class="custom-switch-input change-status">
                    <span class="custom-switch-indicator"></span>
                  </label>';
            }
                return $button;
        })
        ->addColumn('vender', function($query){
            return $query->vendor->shop_name;
        })
        ->addColumn('approved', function($query){
            return "<select class='form-control is_approve' data-id='$query->id'>
            <option value='0'>Pending</option>
            <option selected value='1'>Approved</option>
            </select>";
        })
        ->rawColumns(['image', 'type', 'status', 'action', 'approved'])
        ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Product $model): QueryBuilder
    {
        return $model->where('vendor_id', '!=', Auth::user()->vendor->id)->where('is_approved', 1)->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('sellerproducts-table')
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
            Column::make('vender'),
            Column::make('name'),
            Column::make('price'),
            Column::make('type'),
            Column::make('status'),
            Column::make('approved')->width(100),
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
        return 'SellerProducts_' . date('YmdHis');
    }
}
