<?php

namespace Core;

class Router
{
//--------------------Properties
    /*
     * Routing table
     */
    protected $routes = [];

    /*
     * Params from the match route
     */
    protected $params = [];
//------------------Methods

    /*
     * Add a route to the routing table
     *
     */
    public function add($route, $params = []){
//      Replacing the route to regular exprssion, escap the forward slash
        $route = preg_replace('/\//', '\\/', $route);

//      Replacing variables e.g {controller}
        $route = preg_replace('/\{([a-z]+)}/', '(?P<\1>[a-z-]+)', $route);

//      Replacing variables e.g {id:\d+}
        $route = preg_replace('/\{([a-z]+):([^\}]+)\}/', '(?P<\1>\2)', $route);

//      Adding start and end delimiters, and case insensitive flad
        $route = '/^' . $route . '$/';

        $this->routes[$route] = $params;
    }

    /*
     * Get routes from routing table
     */
    public function getRoutes(){
        return $this->routes;
    }

    /*
     * Matching the requested route to the routing table, setting the param array
     *
     * @param string url
     *
     * @return boolean True if matches, false otherwise
     *
     */

    public function match($url){

        foreach($this->routes as $route => $params){
            if(preg_match($route, $url, $matches)){
                foreach($matches as $key => $match){
                    if(is_string($key)){
                        $params[$key] = $match;
                    }
                }
                $this->params = $params;
                return true;
            }
        }
        return false;
    }


    /*
     * Getting the params
     */

    public function getParam(){
        return $this->params;
    }

    /*
     * Dispathing the routing controller & action
     *
     */
    public function dispatch($url){
        $url = $this->removeQueryString($url);
        if($this->match($url)){
            $controller = $this->params['controller'];
            $controller = $this->convertToStudlyCaps($controller);
            $controller = $this->getNameSpace() . $controller;
             if(class_exists($controller)){
                $controller_object = new $controller($this->params);

                $action = $this->params['action'];
                $action = $this->convertToCamelCase($action);
                if(is_callable([$controller_object, $action])){
                    $controller_object->$action();
                }else{
                    throw new \Exception("Method <b>{$action}</b> in controller <b>{$controller}</b> not found.");
                }
            }else{
                throw new \Exception("Controllers class <b>{$controller}</b> not found.");
            }
        }else{
            throw new \Exception("No route found.");
        }
    }

    protected function removeQueryString($url){
        if($url != ''){
            $parts = explode('&', $url, 2);
            if(strpos($parts[0], '=') === false){
                $url = $parts[0];
            }else{
                $url = '';
            }
            return $url;
        }
    }

    protected function getNameSpace(){
        $namespace = 'App\Controllers\\';
        if(array_key_exists('namespace', $this->params)){
            $namespace .= $this->params['namespace'] . '\\';
        }

        return $namespace;
    }

    protected function convertToStudlyCaps($controller){
        return str_replace(' ', '', ucwords(str_replace('-',' ', $controller)));
    }

    protected function convertToCamelCase($action){
        return  lcfirst($this->convertToStudlyCaps($action));
    }
}