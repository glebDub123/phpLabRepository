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
    }
</style>


