
plugin.tx_simulatefe_simulate {
    view {
        templateRootPaths.0 = EXT:simulatefe/Resources/Private/Templates/
        templateRootPaths.1 = {$plugin.tx_simulatefe_simulate.view.templateRootPath}
        partialRootPaths.0 = EXT:simulatefe/Resources/Private/Partials/
        partialRootPaths.1 = {$plugin.tx_simulatefe_simulate.view.partialRootPath}
        layoutRootPaths.0 = EXT:simulatefe/Resources/Private/Layouts/
        layoutRootPaths.1 = {$plugin.tx_simulatefe_simulate.view.layoutRootPath}
    }
    persistence {
        storagePid = {$plugin.tx_simulatefe_simulate.persistence.storagePid}
        #recursive = 1
    }
    features {
        #skipDefaultArguments = 1
        # if set to 1, the enable fields are ignored in BE context
        ignoreAllEnableFieldsInBe = 0
        # Should be on by default, but can be disabled if all action in the plugin are uncached
        requireCHashArgumentForActionArguments = 1
    }
    mvc {
        #callDefaultActionIfActionCantBeResolved = 1
    }
}

plugin.tx_simulatefe._CSS_DEFAULT_STYLE (
        textarea.f3-form-error {
                background-color:#FF9F9F;
                border: 1px #FF0000 solid;
        }

        input.f3-form-error {
                background-color:#FF9F9F;
                border: 1px #FF0000 solid;
        }

        .{extension.cssClassName} table {
                border-collapse:separate;
                border-spacing:10px;
        }

        .{extension.cssClassName} table th {
                font-weight:bold;
        }

        .{extension.cssClassName} table td {
                vertical-align:top;
        }

        .typo3-messages .message-error {
                color:red;
        }

        .typo3-messages .message-ok {
                color:green;
        }
)

## EXTENSION BUILDER DEFAULTS END TOKEN - Everything BEFORE this line is overwritten with the defaults of the extension builder

plugin.tx_simulatefe_simulate {
	persistence {
		recursive = {$plugin.tx_simulatefe.persistence.recursive}
	}
	settings {
		storagePid        = {$plugin.tx_simulatefe_simulate.persistence.storagePid}
		recursive         = {$plugin.tx_simulatefe_simulate.persistence.recursive}
		securityConcept   = {$plugin.tx_simulatefe_simulate.settings.securityConcept}
		securityGroupList = {$plugin.tx_simulatefe_simulate.settings.securityGroupList}
	}
}


# include JS for wrapper functions
page.includeJSFooter {
  simulatefeJs = EXT:simulatefe/Resources/Public/Scripts/simulatefe.js
  DataTablesJs.forceOnTop = 0
}

page.includeCSS {
   simulatefeCss = EXT:simulatefe/Resources/Public/Styles/simulatefe.css
}


page.1329210700 = USER
page.1329210700  {
	userFunc      =  TYPO3\CMS\Extbase\Core\Bootstrap->run
	pluginName    =  Simulate
	extensionName =  Simulatefe
	controller    =  User
	action        =  list
    vendorName    =  CGB
	settings      =< plugin.tx_simulatefe.settings
	persistence   =< plugin.tx_simulatefe.persistence
	view          =< plugin.tx_simulatefe.view
	switchableControllerActions {
		User {
			1 = list
			2 = switch
			3 = logout
		}
	}
}