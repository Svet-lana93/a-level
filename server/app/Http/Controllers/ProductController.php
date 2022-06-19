<?php
/**
 * PHP version 8
 *
 * @category ProductController_Class
 * @package  App\Http\Controllers
 * @author   Svetlana Shmidt <svetashmidt93@gmail.com>
 * @license  https://www.php.net/license/ PHP License
 * @link     http://localhost:8182/product
 */
namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * ProductController Doc Comment
 *
 * @category ProductController_Class
 * @package  App\Http\Controllers
 * @author   Svetlana Shmidt <svetashmidt93@gmail.com>
 * @license  https://www.php.net/license/ PHP License
 * @link     http://localhost:8182/product
 */
class ProductController extends Controller
{
    /**
     * This method loads the page product
     *
     * @return void
     */
    public function index()
    {
        echo 'This is product controller';
    }
}
