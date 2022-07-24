<?php

namespace App\Console\Commands;

use App\Repositories\BookRepository;
use App\Repositories\UserRepository;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class MyCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'my-command:run {--user_id=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(BookRepository $bookRepository)
    {
        $this->info('Processing');
        $userId = $this->option('user_id');
        $books = $userId ? $bookRepository->byUserId($userId) : $bookRepository->list();
        $this->info(count($books) . ' books found');

        return Storage::put('books-' . date('d-m-Y-H-i-s') . '.csv', $this->getContent($books), 'public');
    }

    private function getContent($books)
    {
        $content = '';
        foreach ($books as $book) {
            $content .= $book->id . ', ' . $book->title . ', ' . $book->user_name . PHP_EOL;
        }
        return $content;
    }
}
