
# 🏰 Gilded Rose Refactoring

This project is a refactored version of the classic Gilded Rose, aimed at improving code quality, maintainability, and extensibility while preserving existing functionality.

## 🎬 Demo
 [Watch Demo](https://app.screencast.com/TcSeyvABPuTro)
## 📦 Requirements

- PHP 8.1
- Composer
- PHPUnit 9.5

## ⚙️ Installation

1. Clone the repository:
   ```bash
   git clone https://github.com/webkleur/gilded-rose.git
   cd gilded-rose
   ```

2. Install dependencies:
   ```bash
   composer install
   ```

## 🧪 Running Tests

Execute the test suite using PHPUnit:
```bash
./vendor/bin/phpunit --testdox
```

## 🛠️ Code Quality Tools

Integrated several tools to maintain high code standards:

- **PHPStan**: Static analysis for PHP.
- **Rector**: Automated refactoring tool.
- **PHP_CodeSniffer (PHPCS)**: Enforces coding standards.
- **GrumPHP**: Pre-commit hooks to prevent broken code from being committed.

Run all validation scripts:
```bash
composer run-validation-scripts
```

## 🧰 Composer Scripts

Defined several Composer scripts for common tasks:

- `fix-rector`: Applies Rector refactorings.
- `fix-cs`: Fixes coding standard violations.
- `validate-rector`: Checks Rector rules without applying changes.
- `validate-phpstan`: Runs PHPStan analysis.
- `validate-phpcs`: Checks coding standards.
- `pre-commit-fix`: Runs fixers before committing.
- `pre-commit-validate`: Runs validators before committing.
- `run-validation-scripts`: Runs all fixers and validators.

## 🔧 GrumPHP Configuration

GrumPHP is configured to run the following tasks on pre-commit:

- `phpstan`: Static analysis.
- `phpcs`: Coding standards check.
- `rector`: Code refactoring.
- `composer_script`: Executes `run-validation-scripts`.

## 🧱 Refactoring Overview

The original `GildedRose` class contained complex and nested conditional logic. Refactored the codebase to improve clarity and maintainability:

- **Strategy Pattern**: Implemented to handle different item behaviors. Each item type has its own updater class implementing the `ItemUpdaterInterface`.
- **Factory Pattern**: Introduced `ItemUpdaterFactory` to instantiate appropriate updater classes based on item types.
- **Strict Typing**: Added `declare(strict_types=1);` to all PHP files.
- **PSR-12 Compliance**: Ensured code adheres to PSR-12 coding standards.

## 📂 Project Structure

```
gilded-rose/
├── src
│   ├── Enum
│   │   ├── ItemNameEnum.php
│   ├── Updaters
│   │   ├── AgedBrieUpdater.php
│   │   ├── BackstagePassUpdater.php
│   │   ├── ConjuredItemUpdater.php
│   │   ├── DefaultItemUpdater.php
│   │   ├── ElixirOfTheMongooseUpdater.php
│   │   └── SulfurasUpdater.php
│   │   └── ItemUpdaterInterface.php
│   ├── GildedRose.php
│   └── Item.php
├── tests
│   ├── Updaters
│   │   ├── AgedBrieUpdaterTest.php
│   │   ├── BackstagePassUpdaterTest.php
│   │   ├── ConjuredItemUpdaterTest.php
│   │   ├── DefaultItemUpdaterTest.php
│   │   └── SulfurasUpdaterTest.php
│   │   └── ElixirOfTheMongooseUpdaterTest.php
│   └── GildedRoseTest.php
├── composer.json
├── composer.lock
├── grumphp.yml
├── phpcs.xml
├── phpstan.neon
├── rector.php
└── README.md

```

## 📖 Original Business Requirements

As per the original Gilded Rose:

- All items have a `SellIn` value and a `Quality` value.
- At the end of each day, `SellIn` and `Quality` are updated.
- Once the sell-by date has passed, `Quality` degrades twice as fast.
- `Quality` is never negative.
- "Aged Brie" increases in `Quality` the older it gets.
- `Quality` is never more than 50.
- "Sulfuras" never has to be sold and never decreases in `Quality`.
- "Backstage passes" increase in `Quality` as `SellIn` approaches; `Quality` increases by 2 when there are 10 days or less and by 3 when there are 5 days or less, but drops to 0 after the concert.

## ✅ Benefits of Refactoring

- **Maintainability**: Simplified code structure makes it easier to manage and extend.
- **Testability**: Modular design allows for targeted unit testing.
- **Scalability**: Easily add new item types with specific behaviors.
- **Code Quality**: Automated tools ensure adherence to best practices.