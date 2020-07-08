<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Profile;
class ProfileController extends Controller
{
    //
    public function add()
    {
        return view('admin.profile.create');
    }
    
public function create(Request $request)
  {   $this->validate($request, Profile::$rules);    $profile = new Profile;
      $form = $request->all();
unset($form['_token']);
      $profile->fill($form);
      $profile->save();
        return redirect('admin/profile/create');
    }
    public function index(Request $request)
  {
      $cond_title = $request->cond_name;
      if ($cond_title != '') {
          // 検索されたら検索結果を取得する
          $posts = Profile::where('name', $cond_title)->get();
      } else {
          // それ以外はすべてのニュースを取得する
          $posts = Profile::all();
      }
      return view('admin.Profile.index', ['posts' => $posts, 'cond_name' => $cond_name]);
  }
  
    
    public function edit()
    {
        return view('admin.profile.edit');
    }
    
    public function update()
    {
        return redirect('admin/profile/edit');
    }
}
