# Magento 2 Module - TermsConditions

Package name: `peterbrain/magento2-terms-conditions`

- [Magento 2 Module - TermsConditions](#magento-2-module---termsconditions)
  - [Main Functionalities](#main-functionalities)
  - [Installation](#installation)
    - [Method 1: Composer (recommended)](#method-1-composer-recommended)
    - [Method 2: Zip file (not recommended)](#method-2-zip-file-not-recommended)
    - [Enable \& deploy](#enable--deploy)
  - [Usage](#usage)
  - [Credits](#credits)

## Main Functionalities

- Display all terms and conditions (Magento built-in feature) of the respective store view on a page.
- Add this page to Sitemap.
- Display specific terms and conditions within a page or block with a widget.

Widget code:
```html
{{widget type="PeterBrain\TermsConditions\Block\Widget\Tc" agreement_id="<id>"}}
```
or use the Magento integrated GUI for widgets.

Widget to display specific terms and conditions:
![Use Widget to display specific terms and conditions.](https://github.com/PeterBrain/magento2-terms-conditions/blob/48eafbb506b34aefd93abbf1b16e809b43fce6f9/terms-conditions_widget.jpg?raw=true)
Admin configuration:
![Admin configuration](https://raw.githubusercontent.com/PeterBrain/magento2-terms-conditions/df2e767d254f19d0604fb7fc6c4f9a4c5a997247/terms-conditions_admin.jpg?raw=true)

## Installation

### Method 1: Composer (recommended)

```bash
composer require peterbrain/magento2-terms-conditions
```

### Method 2: Zip file (not recommended)

- Unzip the zip file in `app/code/PeterBrain`

This extension requires [PeterBrain Core](https://github.com/PeterBrain/magento2-peterbrain-core). Ensure that you have it installed prior to installing this module. Use Composer to install it automatically with this module.

### Enable & deploy

```bash
bin/magento module:enable PeterBrain_TermsConditions
bin/magento setup:upgrade
bin/magento setup:static-content:deploy
bin/magento cache:flush
```

## Usage

- Enable module ouptut in `Stores > Configuration > PeterBrain Extensions > Terms & Conditions > General Configuration`
- In Magento 2 admin, navigate to `Stores > Configuration > Sales > Checkout` and set `Enable Terms and Conditions` to `Yes`. Module status provides you with a short summary.
- If not done already, add a new condition at `Stores > Terms and Conditions`
  - Every condition meeting the scope of your current store view will be displayed at `https://www.example.com/termsconditions/` and your custom url.
- The url to the terms and conditions is automatically added to the sitemap the next time it is generated. If a user-defined url is specified, only this url will be added to the sitemap.

Required system configuration:
![Required system configuration](https://github.com/PeterBrain/magento2-terms-conditions/blob/48eafbb506b34aefd93abbf1b16e809b43fce6f9/terms-conditions_sysconfig.jpg?raw=true)

## Credits

Credits go to [Abdul](https://magento.stackexchange.com/users/31184/abdul) from magento.stackenchange.com for the inspiration. See: <https://magento.stackexchange.com/questions/220500/show-terms-and-conditions-on-static-page>
