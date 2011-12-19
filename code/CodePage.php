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




		

		Requirements::javascript("ss_syntaxHighlighter/javascript/shCore.js");
		/*Requirements::javascript("ss_syntaxHighlighter/javascript/shBrushAS3.js");
		Requirements::javascript("ss_syntaxHighlighter/javascript/shBrushCpp.js");
		Requirements::javascript("ss_syntaxHighlighter/javascript/shBrushCss.js");
		Requirements::javascript("ss_syntaxHighlighter/javascript/shBrushJava.js");
		Requirements::javascript("ss_syntaxHighlighter/javascript/shBrushJScript.js");
		Requirements::javascript("ss_syntaxHighlighter/javascript/shBrushPlain.js");
		Requirements::javascript("ss_syntaxHighlighter/javascript/shBrushPhp.js");
		Requirements::javascript("ss_syntaxHighlighter/javascript/shBrushSql.js");
		Requirements::javascript("ss_syntaxHighlighter/javascript/shBrushXml.js");*/
		
		//AS3, Cpp, Css, Java, Javascript, Plain, PHP, Sql, Xml
		
		switch (CodePage::get_static('CodePage', 'ProgrammingLanguage')) {
		//switch ($this->ProgrammingLanguage) {
				case 'AS3':
				Requirements::javascript("ss_syntaxHighlighter/javascript/shBrushAS3.js");
				break;
				
				case 'Cpp':
				Requirements::javascript("ss_syntaxHighlighter/javascript/shBrushCpp.js");
				break;
				
				case 'Css':
				Requirements::javascript("ss_syntaxHighlighter/javascript/shBrushCss.js");
				break;
				
				case 'Java':
				Requirements::javascript("ss_syntaxHighlighter/javascript/shBrushJava.js");
				break;
				
				case 'Javascript':
					Requirements::javascript("ss_syntaxHighlighter/javascript/shBrushJScript.js");
					break;
				
				case 'Plain':
				Requirements::javascript("ss_syntaxHighlighter/javascript/shBrushPlain.js");
				break;
				
				case 'Php':
				Requirements::javascript("ss_syntaxHighlighter/javascript/shBrushPhp.js");
				break;
				
				case 'Sql':
				Requirements::javascript("ss_syntaxHighlighter/javascript/shBrushSql.js");
				break;
				
				case 'Xml':
					Requirements::javascript("ss_syntaxHighlighter/javascript/shBrushXml.js");
				break;
				
				default:
				Requirements::javascript("ss_syntaxHighlighter/javascript/shBrushJScript.js");
				break;
		}
		Requirements::customScript("SyntaxHighlighter.all();");
		Requirements::css("ss_syntaxHighlighter/css/shCore.css");
		Requirements::css("ss_syntaxHighlighter/css/shThemeDefault.css");
		 
		return $this->renderWith(array('CodePage','Page'));
	}
}