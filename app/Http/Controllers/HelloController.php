<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

$head = '<html><head>';

$style = <<<EOF
<style>
body{font-size:16pt; color:#999;}
h1{ font-size:100pt; text-align:right; color:#eee; margin:-40px 0px -50px 0px;}
</style>
EOF;

$body = '</head><body>';

$end = '</body></head>';

function tag($tag , $txt){
    return "<{$tag}>$txt</{$tag}>";
}

class HelloController extends Controller
{
    public function index(){
        global $head ,$style , $body , $end;
        
        $html = $head.tag('title','Hello/Indexページです').$style.$body
        .tag('h1','Indexページです').'<a href="/hello/other">go to other page</a>'
        .$end;

        return $html;

    }

    public function other(){
        global $head ,$style , $body , $end;

        $html = $head.tag('title','遷移しました。これはotherページです').$style
        .$body
        .tag('h1','other').tag('p','otherページに移りました')
        .$end;

        return $html;
    }
    
}
