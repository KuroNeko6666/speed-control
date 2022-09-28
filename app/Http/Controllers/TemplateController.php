<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TemplateController extends Controller
{
    public function Dashboard()
    {
        $data = [
            "active" => 'dashboard'
        ];
        return view('home.dashboard', $data);
    }

    public function Button()
    {
        $data = [
            "active" => 'component-button'
        ];
        return view('home.components.buttons', $data);
    }

    public function Card()
    {
        $data = [
            "active" => 'component-card'
        ];
        return view('home.components.cards', $data);
    }

    public function Color()
    {
        $data = [
            "active" => 'utilities-color'
        ];
        return view('home.utilities.colors', $data);
    }

    public function Animation()
    {
        $data = [
            "active" => 'utilities-animation'
        ];
        return view('home.utilities.animations', $data);
    }

    public function Border()
    {
        $data = [
            "active" => 'utilities-border'
        ];
        return view('home.utilities.borders', $data);
    }

    public function Other()
    {
        $data = [
            "active" => 'utilities-other'
        ];
        return view('home.utilities.others', $data);
    }

    public function Blank()
    {
        $data = [
            "active" => 'pages-blank'
        ];
        return view('home.pages.blank', $data);
    }

    public function Forgot()
    {
        $data = [
            "active" => 'pages-forgot'
        ];
        return view('home.pages.forgot', $data);
    }

    public function Login()
    {
        $data = [
            "active" => 'pages-login'
        ];
        return view('home.pages.login', $data);
    }

    public function NotFound()
    {
        $data = [
            "active" => 'pages-404'
        ];
        return view('home.pages.notfound', $data);
    }

    public function Register()
    {
        $data = [
            "active" => 'pages-register'
        ];
        return view('home.pages.register', $data);
    }

    public function Chart()
    {
        $data = [
            "active" => 'chart'
        ];
        return view('home.chart', $data);
    }

    public function Table()
    {
        $data = [
            "active" => 'table'
        ];
        return view('home.table', $data);
    }


}
