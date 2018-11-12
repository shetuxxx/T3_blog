<?php

use App\Post;

function c_u_p($request, $actionName=NULL, $slug=NULL){
    $currentUser = $request->user();
    if ($actionName){
        $currentActionName = $actionName;
    }else{
        $currentActionName = $request->route()->getActionName();
    }
    list($controller, $method) = explode('@', $currentActionName);
    $controller = str_replace(["App\\Http\\Controllers\\admin\\", "Controller"], "", $controller);
    $classesMap = [
        'Blog' => 'post',
        'User' => 'user',
        'Category' => 'category'
    ];
    $currentPermissionsMap = [
        'crud' => ['index', 'trashed', 'create', 'store', 'edit', 'update', 'destroy', 'restore', 'kill']
    ];
    foreach ($currentPermissionsMap as $permission => $methods){
        if (in_array($method, $methods) && isset($classesMap[$controller])){
            $className = $classesMap[$controller];
            if ($className == 'post' && in_array($method, ['edit', 'update', 'destroy', 'restore', 'trashed', 'kill'])){
                $slugg = !is_null($slug) ? $slug : $request->route()->slug;
                if ( $slugg  && (!$currentUser->can('uo_post') || !$currentUser->can('do_post'))){
                    $post = Post::withTrashed()->where('slug', $slugg)->first();
                    if ($post->user_id !== $currentUser->id){
                        return false;
                    }
                }
            }
            elseif (! $currentUser->can("{$permission}_{$className}")){
                return false;
            }
            break;
        }
    }
    return true;
}