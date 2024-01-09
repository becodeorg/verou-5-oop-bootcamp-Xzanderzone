<?php
class content
{
  private string $title;
  private string $titleModified;
  private string $type;
  private string $content;
  private string $breakingNews;
  public function __construct(string $title, string $content, string $type = "article", bool $breakingNews = false)
  {
    $this->title = $title;
    $this->content = $content;
    $this->type = $type;
    $this->breakingNews = $breakingNews;
    // setFullTitle();
  }

  public function getTitle(bool $original = false): string
  {
    if ($original)
      return $this->title;
    switch ($this->type) {
      case "ad":
        $this->titleModified = strtoupper($this->title);
        break;
      case "vacancy":
        $this->titleModified = $this->title . " - apply now!";
        break;
      default: //article
        $this->titleModified = $this->title;
        break;
    }
    if ($this->breakingNews)
      return 'BREAKING NEWS: ' . $this->titleModified;
    else
      return $this->titleModified;
  }
  public function getType(): string
  {
    return $this->type;
  }
  public function getContent(): string
  {
    return $this->content;
  }
  public function setType(string $type): void
  {
    $this->type = $type;
  }
  public function setTitle(string $title): void
  {
    $this->title = $title;
  }
}

$array[] = new content("testing", "some test content");
$array[] = new content("testing", "some important content", 'article', true);
$array[] = new content("raid shadow legends", "new booster pack 10% discount", "ad");
$array[] = new content("web dev", "sql only", 'vacancy');
foreach ($array as $i => $content) {
  echo '<h1>' . $content->getTitle() . '</h1>';
  echo '<p>' . $content->getContent() . '<p><br>';
}