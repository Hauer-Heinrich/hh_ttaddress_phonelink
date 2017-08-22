# tt_address phone links

## What does it do?
The extension gives you the possibility to change the output of e. g. field "phone" with a link wrap.
(e. g.: ``` <a href="tel:00493829839" title="my title">+49 382 983 9</a> ```)

## to use in typoscript e. g.:

plugin.tx_ttaddress_pi1 {
  pidList = 20
  templatePath = fileadmin/Template/Extensions/tt_address/
  defaultTemplateFileName = default_hcard.htm
  templates {
    default {
      phone {
        # Eigene Funktion für Links bei Telefonnummern
        postUserFunc = Typo3\HhTtAddressPhoneLink\Hooks\hh_ttaddress_phonelink->user_tt_address_tel_link
        postUserFunc {
          # Germany
          countryCode = 49
          areaCode = 94036
          titlename = Telefonisch für Sie erreichbar unter
          mobile = 0
        }
        wrap = Tel.:&nbsp;|
        required = 1
      }
    }
  }
}

### Known Issues
  - none so far

#### Original Code
from http://p.cweiske.de/45 Christian Weiske
