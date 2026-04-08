<?php
class Page {
    private string $name;
    private string $template;

    public function __construct() {
        $this->name = "page";
        $this->template = "<div><p>It is a default page</p></div>";
    }

    public function render(): void {
        echo $this->template;
    }
}
?>
