<?php

use App\Post;

function  check_user_permissions($request, $actionName = NULL, $id = NULL)
{

    $currentUser = $request->user();
    if($actionName)
    {
        $currentActionName = $actionName;
    }
    else{
        $currentActionName = $request->route()->getActionName();
    }
    //get the current actionname
    list($controller,$method) = explode('@', $currentActionName);
    $controller = str_replace(["App\\Http\\Controllers\\Backend\\", "Controller"], "", $controller );
    //dd($controller);

    $classesMap = [
        'Blog' => 'post',
        'Categories' => 'category',
        'Users' => 'user',
        'PaymentsPlans' => 'plan'
    ];
    $crudPermission = [
        // 'create' => ['create', 'store'],
        // 'read' =>   ['index', 'view'],
        // 'update' => ['edit', 'update'],
        // 'delete' => ['destroy', 'restore', 'forceDestory'],
        'crud' => ['create', 'store', 'edit', 'update', 'destroy', 'restore', 'forceDestroy', 'index', 'view'],

    ];

        foreach ($crudPermission as $permission => $methods)
        {
            if(in_array($method, $methods) && isset($classesMap[$controller]))
            {

                $className = $classesMap[$controller];

                if($className == 'post' && in_array($method, ['edit', 'update', 'destroy', 'restore', 'forceDestroy']))
                {
                    $id = !is_null($id) ? $id : $request->route("blog");
                    //if current user has not update-other-post/delete-other-post permission
                    //make sure he/she only modify his/her own post
                    if( $id && (!$currentUser->isAbleTo('update-others-post') || !$currentUser->isAbleTo('delete-others-post')))
                    {
                        $post = Post::withTrashed()->find($id);
                        if($post->author_id != $currentUser->id){
                           return false;

                        }
                    }

                }
                //if the current user dont have that permission dont allow the current request!!
                elseif(! $currentUser->isAbleTo("{$permission}-{$className}"))
                {
                   return false;
                }
            break;

            }
        }
    return true;
   }

