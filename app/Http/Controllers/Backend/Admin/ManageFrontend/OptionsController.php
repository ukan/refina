<?php

namespace App\Http\Controllers\Backend\Admin\ManageFrontend;

use Illuminate\Http\Request;
use App\Models\Option;
use App\Http\Controllers\Backend\Admin\BaseController;
use Input;
use Validator;

class OptionsController extends BaseController
{
    /**
     * {@inheritDoc}
     */
    public function __construct()
    {
        parent::__construct();
        $labs_menu_url = getOptionValue('labs_menu_url');
        $support_menu_url = getOptionValue('support_menu_url');
        $affilate_menu_url = getOptionValue('affilate_menu_url');
        $facebook_url = getOptionValue('facebook_url');
        $twitter_url = getOptionValue('twitter_url');
        $linkedin_url = getOptionValue('linkedin_url');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $req)
    {
        $param = $req->all();
        if(array_key_exists('message', $param)) {
            flash()->success($param['message']);
            return view('backend.admin.manage-frontend.options.index');
        } else {
            return view('backend.admin.manage-frontend.options.index');
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function save(Request $req)
    {

        $param = $req->all();
        $rules = array(
            //'value'   => 'required',
        );
        $validate = Validator::make($param,$rules);
        if($validate->fails()) {

                
                    echo '<div class="alert alert-danger">';
                    foreach ($validate->messages()->all() as $message) {
                        echo '<span class="text-danger">'.$message.'</span><br>';
                    }
                    echo '</div>';

        } else {

                $options = Option::where('name',$req->name)->get()->first();
                $options->value = $req->value;
                $options->save();
          
                echo 'success_save_option';
        }
    }
    /**
     * Datatables for Menu Management.
     *
     * @return \Illuminate\Http\Response
     */
    public function datatables()
    {
         return datatables(Option::select('id','name','value')->get())
                ->addColumn('action', function ($options) {

                    return '<a href="javascript:show_form_edit_options('.$options->id.')" class="btn btn-warning btn-xs" title="Edit"><i class="fa fa-pencil-square-o fa-fw"></i></a>';
                })
                ->editColumn('name', function ($options) {                    
                    return ucwords(str_replace("_"," ",$options->name));
                })
                ->make(true);
    }

    /**
     * Handle create and edit method.
     *
     * @param  array  $datatoBind
     * @param  int    $id
     * @return \Illuminate\Http\Response
     */

    public function show_form_edit(Request $req)
    {
        $option = Option::find($req->id);
        echo '<form action="'.route('admin-save-option').'" method="post" class="jquery-form-save-option">';
        echo '<div class="errorsMessageFormEdit"></div>';
        echo '<input type="hidden" name="name" value="'.$option->name.'">';
        echo '<div class="form-group">
                    <label class="col-lg-3 control-label">Name</label>
                    <div class="col-lg-9">
                        '.ucwords(str_replace("_"," ",$option->name)).'                        
                    </div>
                    <div class="clear"></div>
                </div>';
        echo '<div class="form-group">
                    <label class="col-lg-3 control-label">Value</label>
                    <div class="col-lg-9">
                        <input type="text" name="value" value="'.$option->value.'">             
                    </div>
                    <div class="clear"></div>
                </div>';
        echo '<div class="form-group">
                    <label class="col-lg-3 control-label"></label>
                    <div class="col-lg-9">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                    <div class="clear"></div>
                </div>';
        echo '</form>';
        echo '<script type="text/javascript">';
        echo "
  $('.jquery-form-save-option').ajaxForm({
      success: function(response) {
        if(response.indexOf('success_save_option') >= 0){
          var myStack = {'dir1':'down', 'dir2':'right', 'push':'top'};
          new PNotify({
              title: 'Success',
              text: 'Edit Success',
            type: 'success',
              addclass: 'stack-custom',
              stack: myStack
          });
            $('#getFormEditModal').modal('hide');
            $('.errorsMessageFormEdit').html('');   
            $('#options-table').DataTable().ajax.reload();     

        }else{
            $('.errorsMessageFormEdit').html(response);
        }
      }
  }); ";
echo '</script>';
    }
    /**
     * Handle store and update method.
     *
     * @param  \App\Http\Requests\Backend\UserTrustee\MenuRequest $request
     * @param  int                                          $id
     * @return \Illuminate\Http\Response
     */
    private function storeUpdate(Request $request, $id = 0)
    {

    }
}
