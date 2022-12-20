<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    // Load home page with menu list
    public function getMenus() {
        $path = "docs";
        $menus = scandir($path);

        $menuList = [];

        foreach ($menus as $menu) {
            if (basename($menu) != "." && basename($menu) != "..") {
                $menuInfo = [
                    "menuName" => "",
                    "menuFullName" => "",
                ];
                $nameFilter = explode(".", $menu);
                $cleanName = str_replace("_", " ", $nameFilter[0]);
                $menuInfo['menuName'] = $cleanName;
                $menuInfo['menuFullName'] = basename($menu);

                array_push($menuList, $menuInfo);
            }
        }

        return view('home', [
            "menus" => $menuList,
        ]);
    }

    // Upload new menu
    public function uploadMenu(Request $request) {
        $fileName = $request->file('menuItem')->getClientOriginalName();

        $request->file('menuItem')->storeAs("", $fileName, "docs");

        return redirect('/');
    }

    // Remove menu from navbar list
    public function removeMenu(Request $request) {
        $fileName = $request->input('menuName');
        unlink(public_path() . "/docs/" . $fileName);

        return redirect('/');
    }
}
