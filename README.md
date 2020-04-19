# Magento 2 Module - PeterBrain TermsConditions

      ``peterbrain/module-termsconditions``

- [Magento 2 Module - PeterBrain TermsConditions](#magento-2-module---peterbrain-termsconditions)
  - [Main Functionalities](#main-functionalities)
  - [Installation](#installation)
    - [Type 1: Zip file](#type-1-zip-file)
    - [Type 2: Composer](#type-2-composer)
  - [Specifications](#specifications)

## Main Functionalities

display terms and conditions for a storeview on a page

## Installation

\* = in production please use the `--keep-generated` option

### Type 1: Zip file

- Unzip the zip file in `app/code/PeterBrain`
- Enable the module by running `php bin/magento module:enable PeterBrain_TermsConditions`
- Apply database updates by running `php bin/magento setup:upgrade`\*
- Flush the cache by running `php bin/magento cache:flush`

### Type 2: Composer

- Make the module available in a composer repository for example:
  - private repository `repo.magento.com`
  - public repository `packagist.org`
  - public github repository as vcs
- Add the composer repository to the configuration by running `composer config repositories.repo.magento.com composer https://repo.magento.com/`
- Install the module composer by running `composer require peterbrain/module-termsconditions`
- Enable the module by running `php bin/magento module:enable PeterBrain_TermsConditions`
- Apply database updates by running `php bin/magento setup:upgrade`\*
- Flush the cache by running `php bin/magento cache:flush`

## Specifications

- Controller
  - frontend > termsconditions/index/index
