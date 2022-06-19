<?php
/**
 * PHP version 8
 *
 * @category CategoryController_Class
 * @package  App\Http\Controllers
 * @author   Svetlana Shmidt <svetashmidt93@gmail.com>
 * @license  https://www.php.net/license/ PHP License
 * @link     http://localhost:8182/category
 */
namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * CategoryController Doc Comment
 *
 * @category CategoryController_Class
 * @package  App\Http\Controllers
 * @author   Svetlana Shmidt <svetashmidt93@gmail.com>
 * @license  https://www.php.net/license/ PHP License
 * @link     http://localhost:8182/category
 */
class CategoryController extends Controller
{
    /**
     * This method loads the page category
     *
     * @return void
     */
    public function index()
    {
        echo 'This is category controller';
    }
}
