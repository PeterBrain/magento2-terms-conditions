# Magento 2 Module - TermsConditions

Package name: `peterbrain/magento2-terms-conditions`

- [Magento 2 Module - TermsConditions](#magento-2-module---termsconditions)
  - [Main Functionalities](#main-functionalities)
  - [Installation](#installation)
    - [Method 1: Composer (recommended)](#method-1-composer-recommended)
    - [Method 2: Zip file (not recommended)](#method-2-zip-file-not-recommended)
    - [Enable & deploy](#enable--deploy)
  - [Usage](#usage)
  - [Credits](#credits)

## Main Functionalities

Shows all terms and conditions (Magento built-in feature) of the respective store view on a page.

## Installation

### Method 1: Composer (recommended)

```bash
composer require peterbrain/magento2-terms-conditions
```

### Method 2: Zip file (not recommended)

- Unzip the zip file in `app/code/PeterBrain`

This extension is dependent on [PeterBrain Core](https://github.com/PeterBrain/magento2-peterbrain-core). Make sure that you have installed it first.

### Enable & deploy

```bash
php bin/magento module:enable PeterBrain_TermsConditions
php bin/magento setup:upgrade
php bin/magento cache:flush
```

## Usage

- Enable module ouptut in `Stores > Configuration > PeterBrain Extensions > Terms & Conditions > General Configuration`
- In Magento 2 admin, navigate to `Stores > Configuration > Sales > Checkout` and set `Enable Terms and Conditions` to `Yes`
- If not done already, add a new condition at `Stores > Terms and Conditions`
  - Every condition meeting the scope of your current store view will be displayed at `https://www.example.com/termsconditions/`.

## Credits

Credits go to [Abdul](https://magento.stackexchange.com/users/31184/abdul) from magento.stackenchange.com for sharing the code. See: <https://magento.stackexchange.com/questions/220500/show-terms-and-conditions-on-static-page>
