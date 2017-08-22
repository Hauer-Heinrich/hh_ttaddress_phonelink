<?php
    namespace Typo3\HhTtAddressPhoneLink\Hooks;

    class hh_ttaddress_phonelink {

        /**
         * Create tt_address phone link
         *
         * @param string $orig tt_address telephone number
         * @param array  $conf Typoscript configuration for this userfunc
         *                     Keys:
         *                     - "countryCode": default country code, "49" for Germany
         *                     - "areaCode": default area code, without leading zero
         *                     - "titlename": link title attribute / string
         *                     - "mobile": default false / bool
         *
         * @return string HTML code with a link to the telephone number
         */
        public function user_tt_address_tel_link($orig, $conf) {
            // Wenn Mobile gesetzt
            if($conf['mobile'] == 1) {
                return '<span class="tel mobile voice"><a href="tel:'
                    . htmlspecialchars($this->format_telephone_number_rfc3966($orig, $conf))
                    . '" title="' . $conf['titlename'] . '">' . $orig . '</a></span>';
            } else {
                return '<span class="tel home voice"><a href="tel:'
                    . htmlspecialchars($this->format_telephone_number_rfc3966($orig, $conf))
                    . '" title="' . $conf['titlename'] . '">' . $orig . '</a></span>';
            }
        }

        /**
         * Convert a telephone number into a full-featured RFC 3966 telephone number
         *
         * @param string $orig Original telephone number, may be partial
         * @param array  $conf Configuration. Keys:
         *                     - "countryCode": default country code, "49" for Germany
         *                     - "areaCode": default area code, without leading zero
         *
         * @return string Full RFC 3966-compatible telephone number
         *
         * @author Christian Weiske <cweiske@cweiske.de>
         */
        public function format_telephone_number_rfc3966($orig, $conf) {
            if (!isset($conf['countryCode'])) {
                $conf['countryCode'] = '49'; // 49 germany
            }
            if (!isset($conf['areaCode'])) {
                $conf['areaCode'] = '3425';
            }

            $num = preg_replace('#[^+0-9]#', '', $orig);
            if (substr($num, 0, 1) == '+') {
                //full telephone number
                $tel = $num;
            } else if (substr($num, 0, 2) == '00') {
                //full number with country code, but 00 instead of +
                $tel = '+' . substr($num, 2);
            } else if (substr($num, 0, 1) == '0') {
                //full number without country code
                $tel = '+' . $conf['countryCode'] . substr($num, 1);
            } else {
                //partial number, no country or area code
                $tel = '+' . $conf['countryCode'] . $conf['areaCode'] . $num;
            }

            return $tel;
        }
    }
?>
