<?php
/**
 * PHP version 8
 *
 * @category UserController_Class
 * @package  App\Http\Controllers
 * @author   Svetlana Shmidt <svetashmidt93@gmail.com>
 * @license  https://www.php.net/license/ PHP License
 * @link     http://localhost:8182/user
 */
namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * UserController Doc Comment
 *
 * @category UserController_Class
 * @package  App\Http\Controllers
 * @author   Svetlana Shmidt <svetashmidt93@gmail.com>
 * @license  https://www.php.net/license/ PHP License
 * @link     http://localhost:8182/user
 */
class UserController extends Controller
{
    /**
     * This method loads the page user
     *
     * @return void
     */
    public function index()
    {
        echo 'This is user controller';
    }
}
