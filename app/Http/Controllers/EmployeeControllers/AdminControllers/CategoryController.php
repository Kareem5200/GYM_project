<?php

namespace App\Http\Controllers\EmployeeControllers\AdminControllers;

use App\Models\Category;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Models\CategoryDepartment;
use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeRequests\CategoryRequests\AddRequest;

class CategoryController extends Controller
{
    public function categories(){
        $categories = Category::get();
        return view('employees.admins.categories.categories',compact('categories'));
    }
    public function addCategory(){
        $departments = Department::get(['id','name']);
        return view('employees.admins.categories.addCategory',compact('departments'));
    }
    public function createCategory(AddRequest $request){

        $category = Category::where(['category'=>$request->category,'plan'=>$request->plan])->first(['id']);

        if(!empty($category)){
            $category_department_exists= $category->departments()->where('department_id',$request->department_id)->exists();
            if($category_department_exists){
                return redirect()->back()->with('error',"The $request->category category is already exists with same department and plan");
            }
            $category->departments()->attach($request->department_id, ['price' => $request->price]);
            return to_route('employees.categories')->with('success','Category added successfully');
        }

        $category = Category::create($request->except('department_id', 'price'));
        $category->departments()->attach($request->department_id, ['price' => $request->price]);
        return to_route('employees.categories')->with('success','Category added successfully');

    }
    public function categoryDepartments(Category $category){
        return view('employees.admins.categories.departmentsCategory',compact('category'));
    }
    public function changeDepartmentStatus(Category $category,$department_id){
        $department_category_exists=$category->departments()->where('department_id',$department_id)->first()->pivot;

        if(!empty($department_category_exists)){

            if($department_category_exists->status == 'active'){
                $department_category_exists->status ='deactive';
                $department_category_exists->save();
                return to_route('employees.categoryDepartments',$category->id)->with('success','Status changed successfully');
            }

            $department_category_exists->status ='active';
            $department_category_exists->save();
            return to_route('employees.categoryDepartments',$category->id)->with('success','Status changed successfully');

        }
            return to_route('employees.categoryDepartments',$category->id)->with('success','Somethig wrong');





    }
    public function editCategoryPrice(Request $request,$category_id,$department_id){
        $validated = $request->validate([
            'price'=>['required','numeric','min:0'],
        ]);

        $category = Category::find($category_id);

        if ($category) {
            $category->departments()->updateExistingPivot($department_id, $validated);
            return to_route('employees.categoryDepartments', $category_id)->with('success', 'Price changed successfully');
        }


           return to_route('employees.categoryDepartments',$category_id)->with('success','Somethig wrong');

    }

}
