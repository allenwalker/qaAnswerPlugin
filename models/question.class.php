<?phpclass Question{	public $id;	public $title;	public $tags;	public $body;		public function _construct($id, $title, $tags, $body){		$this->id= $id;		$this->title=$title;		$this->tags=$readTags($tags);		$this->body=$body;	}                public function display(){            echo "<h2>$this->title</h2>";            echo $this->tag;            echo $this->body;        }                public function readTags($tags){            // Use xml or string function to read here        }}?>