# Magento 2 TermsConditions

- [Magento 2 TermsConditions](#magento-2-termsconditions)
  - [Main Functionalities](#main-functionalities)
  - [Installation](#installation)
    - [Method 1: Composer (recommended)](#method-1-composer-recommended)
    - [Method 2: Zip file (not recommended)](#method-2-zip-file-not-recommended)
  - [Usage](#usage)
  - [Credits](#credits)

## Main Functionalities

Shows all terms and conditions of the respective store view on a page

## Installation

### Method 1: Composer (recommended)

```bash
composer require peterbrain/magento2-termsconditions

php bin/magento module:enable PeterBrain_TermsConditions
php bin/magento setup:upgrade
php bin/magento cache:flush
```

### Method 2: Zip file (not recommended)

- Unzip the zip file in `app/code/PeterBrain`
- Enable the module by running `php bin/magento module:enable PeterBrain_TermsConditions`
- Apply database updates by running `php bin/magento setup:upgrade`
- Flush the cache by running `php bin/magento cache:flush`

## Usage

- From Magento 2 admin panel, navigate to `Stores > Configuration > Sales > Checkout` and set `Enable Terms and Conditions` to `Yes`
- If not done already, add a new condition at `Stores > Terms and Conditions`
  - Every condition meeting the scope of your current store view will be displayed at `https://www.example.com/termsconditions/`.

## Credits

Credits go to [Abdul](https://magento.stackexchange.com/users/31184/abdul) from magento.stackenchange.com for sharing the code. See: <https://magento.stackexchange.com/questions/220500/show-terms-and-conditions-on-static-page>
