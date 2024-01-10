<?php
class content
{
  private string $title;
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
    $titleModified = '';
    switch ($this->type) {
      case "ad":
        $titleModified = strtoupper($this->title);
        break;
      case "vacancy":
        $titleModified = $this->title . " - apply now!";
        break;
      default: //article
        $titleModified = $this->title;
        break;
    }
    if ($this->breakingNews)
      return 'BREAKING NEWS: ' . $titleModified;
    else
      return $titleModified;
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

