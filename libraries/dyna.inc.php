<?php



/*

 +-----------------------------------------------------------------------+

 | Copyright (c) 2002, Richard Heyes, Harald Radi                        |

 | All rights reserved.                                                  |

 |                                                                       |

 | Redistribution and use in source and binary forms, with or without    |

 | modification, are permitted provided that the following conditions    |

 | are met:                                                              |

 |                                                                       |

 | o Redistributions of source code must retain the above copyright      |

 |   notice, this list of conditions and the following disclaimer.       |

 | o Redistributions in binary form must reproduce the above copyright   |

 |   notice, this list of conditions and the following disclaimer in the |

 |   documentation and/or other materials provided with the distribution.| 

 | o The names of the authors may not be used to endorse or promote      |

 |   products derived from this software without specific prior written  |

 |   permission.                                                         |

 |                                                                       |

 | THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS   |

 | "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT     |

 | LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR |

 | A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT  |

 | OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, |

 | SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT      |

 | LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, |

 | DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY |

 | THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT   |

 | (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE |

 | OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.  |

 |                                                                       |

 +-----------------------------------------------------------------------+

 | Author: Richard Heyes <richard@phpguru.org>                           |

 |         Harald Radi <harald.radi@nme.at>                              |

 +-----------------------------------------------------------------------+

*/



require_once('tree.inc.php');



class HTML_TreeMenu

{

	

	var $items;

	var $layer;

	var $images;

	var $menuobj;



	function HTML_TreeMenu($layer, $images, $linkTarget = '_self', $usePersistence = false)

	{

		$this->menuobj        = 'objTreeMenu';

		$this->layer          = $layer;

		$this->images         = $images;

		$this->linkTarget     = $linkTarget;

		$this->usePersistence = $usePersistence;

	}



	function &addItem(&$menu)

	{

		$this->items[] = &$menu;

		return $this->items[count($this->items) - 1];

	}



	function printMenu()

	{

		echo "\n";



 		echo '<script language="javascript" type="text/javascript">' . "\n\t";

		echo sprintf('%s = new TreeMenu("%s", "%s", "%s", "%s");',

		             $this->menuobj,

					 $this->layer,

					 $this->images,

					 $this->menuobj,

					 $this->linkTarget);

 

		echo "\n";



		if (isset($this->items))

		{

			for ($i=0; $i<count($this->items); $i++)

			{

				$this->items[$i]->_printMenu($this->menuobj . ".n[$i]");

			}

		}



 		echo sprintf("\n\t%s.drawMenu();", $this->menuobj);

		if ($this->usePersistence)

		{

			echo sprintf("\n\t%s.resetBranches();", $this->menuobj);

		}

		echo "\n</script>";

	}

}



class HTML_TreeNode

{

	var $text;

	var $link;

	var $icon;

	var $items;

	var $expanded;



	function HTML_TreeNode($text = null, $link = null, $icon = null, $expanded = false, $isDynamic = true)

	{

		$this->text      = (string)$text;

		$this->link      = (string)$link;

		$this->icon      = (string)$icon;

		$this->expanded  = $expanded;

		$this->isDynamic = $isDynamic;

	}



	function &addItem(&$node)

	{

		$this->items[] = &$node;

		return $this->items[count($this->items) - 1];

	}



	function _printMenu($prefix)

	{

		echo sprintf("\t%s = new TreeNode('%s', %s, %s, %s, %s);\n",

		             $prefix,

		             $this->text,

		             !empty($this->icon) ? "'" . $this->icon . "'" : 'null',

		             !empty($this->link) ? "'" . $this->link . "'" : 'null',

					 $this->expanded  ? 'true' : 'false',

					 $this->isDynamic ? 'true' : 'false');



		if (!empty($this->items)) {

			for ($i=0; $i<count($this->items); $i++) {

				$this->items[$i]->_printMenu($prefix . ".n[$i]");

			}

		}

	}

}

?>

