<?php
class Page {
    protected string $name;
    protected string $template;

    public function __construct() {
        $this->name = "page";
        $this->template = "<div><p>It is a default page</p></div>";
    }

    public function render(): void {
        echo $this->template;
    }
}

class BlogPage extends Page{
    public function __construct() {
        $this->name = "blog";
        $this->template = '
        <div class="cards-container">
        <div class="card">
            <h3>Чай</h3>
            <p>Успокаивающий напиток</p>
            <button>Выбрать чай</button>
        </div>
        
        <div class="card">
            <h3>Кофе</h3>
            <p>Энергичный напиток</p>
            <button>Выбрать кофе</button>
        </div>
    </div>';
    }
}

$page;
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 'page';
}
echo "<a href='?page=page'>Главная страница</a> | ";
echo "<a href='?page=blog'>Чай или Кофе</a>";
echo "<hr>";

if ($page === 'blog') {
    $blogPage = new BlogPage();
    $blogPage->render();
} else {
    $defaultPage = new Page();
    $defaultPage->render();
}
?>

<style>
    .cards-container {
        display: flex;
    }
    .card {
        border: 1px solid #ccc;
        border-radius: 10px;
        padding: 20px;
        width: 200px;
        text-align: center;
    }
    .card button {
        background: #4CAF50;
        color: white;
        border: none;
        padding: 8px 16px;
        border-radius: 5px;
        cursor: pointer;
    }
    .card button:hover {
        background: #45a049;
    }
</style>


