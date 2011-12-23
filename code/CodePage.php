<?php
class CodePage extends Page {

	static $db = array(
      "ProgrammingLanguage" => "Enum('AS3, Cpp, Css, Java, Javascript, Plain, Php, Sql, Xml')", 
	);
	 
	function getCMSFields() {
		$fields = parent::getCMSFields();
		$fields->addFieldToTab("Root.Content.Main",
		new DropdownField(	'ProgrammingLanguage',
							'ProgrammingLanguage',
							singleton('CodePage')->dbObject('ProgrammingLanguage')->enumValues()
						)
		, 'Content'
		);
		return $fields;
	}
	 
	public function codeContent(){

		$preBrackets;
		switch ($this->ProgrammingLanguage) {
			case 'AS3':
				$preBrackets = '<pre class="brush: AS3">';
				break;			
			case 'Cpp':
				$preBrackets = '<pre class="brush: Cpp">';
				break;			
			case 'Css':
				$preBrackets = '<pre class="brush: Css">';
				break;			
			case 'Java':
				$preBrackets = '<pre class="brush: Java">';
				break;			
			case 'Javascript':
				$preBrackets = '<pre class="brush: js">';
				break;
			case 'Plain':
				$preBrackets = '<pre class="brush: Plain">';
					break;
			case 'Php':
				$preBrackets = '<pre class="brush: php">';
					break;
			case 'Sql':
				$preBrackets = '<pre class="brush: Sql">';
				break;
			case 'Xml':
				$preBrackets = '<pre class="brush: Xml">';
				break;
			default:
				$preBrackets = '<pre class="brush: Php">';
			break;
			default:
		}
		return str_replace("<pre>", $preBrackets, $this->Content);
	}

}
class CodePage_Controller extends Page_Controller {

	/**
	 * An array of actions that can be accessed via a request. Each array element should be an action name, and the
	 * permissions or conditions required to allow the user to access it.
	 *
	 * <code>
	 * array (
	 *     'action', // anyone can access this action
	 *     'action' => true, // same as above
	 *     'action' => 'ADMIN', // you must have ADMIN permissions to access this action
	 *     'action' => '->checkAction' // you can only access this action if $this->checkAction() returns true
	 * );
	 * </code>
	 *
	 * @var array
	 */
	public static $allowed_actions = array (
	);

	public function init() {
		parent::init();


		// Note: you should use SS template require tags inside your templates
		// instead of putting Requirements calls here.  However these are
		// included so that our older themes still work


		Requirements::javascript("SSSyntaxHighlighter/javascript/shCore.js");
		/*Requirements::javascript("SSSyntaxHighlighter/javascript/shBrushAS3.js");
		Requirements::javascript("SSSyntaxHighlighter/javascript/shBrushCpp.js");
		Requirements::javascript("SSSyntaxHighlighter/javascript/shBrushCss.js");
		Requirements::javascript("SSSyntaxHighlighter/javascript/shBrushJava.js");
		Requirements::javascript("SSSyntaxHighlighter/javascript/shBrushJScript.js");
		Requirements::javascript("SSSyntaxHighlighter/javascript/shBrushPlain.js");
		Requirements::javascript("SSSyntaxHighlighter/javascript/shBrushPhp.js");
		Requirements::javascript("SSSyntaxHighlighter/javascript/shBrushSql.js");
		Requirements::javascript("SSSyntaxHighlighter/javascript/shBrushXml.js");*/
		
		//AS3, Cpp, Css, Java, Javascript, Plain, PHP, Sql, Xml
		
		//switch (CodePage::get_static('CodePage', 'ProgrammingLanguage')) {
		switch ($this->ProgrammingLanguage) {
				case 'AS3':
				Requirements::javascript("SSSyntaxHighlighter/javascript/shBrushAS3.js");
				break;
				
				case 'Cpp':
				Requirements::javascript("SSSyntaxHighlighter/javascript/shBrushCpp.js");
				break;
				
				case 'Css':
				Requirements::javascript("SSSyntaxHighlighter/javascript/shBrushCss.js");
				break;
				
				case 'Java':
				Requirements::javascript("SSSyntaxHighlighter/javascript/shBrushJava.js");
				break;
				
				case 'Javascript':
					Requirements::javascript("SSSyntaxHighlighter/javascript/shBrushJScript.js");
					break;
				
				case 'Plain':
				Requirements::javascript("SSSyntaxHighlighter/javascript/shBrushPlain.js");
				break;
				
				case 'Php':
				Requirements::javascript("SSSyntaxHighlighter/javascript/shBrushPhp.js");
				break;
				
				case 'Sql':
				Requirements::javascript("SSSyntaxHighlighter/javascript/shBrushSql.js");
				break;
				
				case 'Xml':
					Requirements::javascript("SSSyntaxHighlighter/javascript/shBrushXml.js");
				break;
				
				default:
					echo "<h1>nring bang-".$this->ProgrammingLanguage."-</h1>";
				Requirements::javascript("SSSyntaxHighlighter/javascript/shBrushJScript.js");
				break;
		}
		Requirements::customScript("SyntaxHighlighter.all();");
		//Requirements::css("SSSyntaxHighlighter/css/shCore.css");
		//Requirements::css("SSSyntaxHighlighter/css/shThemeDefault.css");
		 
		return $this->renderWith(array('CodePage','Page'));
	}
}