<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class UserAuth implements FilterInterface {
    
    public function before(RequestInterface $request, $arguments = null){
        if (!session()->get('logged_in')==TRUE) {
            return redirect()->to(base_url());
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null){

    }
}
