# 🏰 Gilded Rose Refactoring

This project is a carefully refactored version of the classic [Gilded Rose kata](https://github.com/zibios/gilded-rose-php/tree/main), designed to demonstrate clean code, maintainability, extensibility, and SOLID principles — while preserving the original business logic.

---

## 🎬 Demo
[Watch Demo](https://app.screencast.com/o6zVI9O9BkPCE)

---

## 📦 Requirements
- PHP 8.1+
- Composer
- PHPUnit 9.5

---

## ⚙️ Installation
```bash
git clone https://github.com/webkleur/gilded-rose.git
cd gilded-rose
composer install
```

---

## 🧪 Running Tests
Run all unit and integration tests:
```bash
./vendor/bin/phpunit --testdox
```

---

## 🧰 Composer Scripts
```bash
composer fix-rector             # Applies Rector refactorings
composer fix-cs                 # Fixes code style violations
composer validate-phpstan       # Runs PHPStan static analysis
composer validate-phpcs         # Checks coding standards
composer run-validation-scripts # Runs all fixers and validators
```

---

## 🛠️ Code Quality Tools
- **PHPStan** – Static code analysis
- **Rector** – Automated refactorer
- **PHPCS** – PSR-12 coding style checker
- **GrumPHP** – Pre-commit quality gate

---

## 🔧 GrumPHP Configuration
GrumPHP is configured to enforce quality before commits:
- `phpstan`
- `phpcs`
- `rector`
- `composer_script` (`run-validation-scripts`)

---

## 🧱 Refactoring Overview

### ✅ Patterns & Practices
- **Strategy Pattern**: Each item type has its own `Updater` class implementing `ItemUpdaterInterface`.
- **Decorator Pattern**: `ConjuredItemUpdater` wraps any other updater to apply accelerated degradation.
- **Factory Pattern**: `ItemUpdaterFactory` selects the correct updater per item.
- **Bounded Logic Trait**: `QualityBounded` centralizes quality constraints to avoid duplication.
- **Strict Typing**: All files declare strict mode.
- **PSR-12**: Code adheres to PSR-12 coding standards.

### ✅ SOLID Principles
| Principle | Status | Explanation |
|-----------|--------|-------------|
| **S** – Single Responsibility | ✅ | Each updater handles only one item type’s behavior. |
| **O** – Open/Closed | ✅ | Adding a new item only requires a new updater and a factory mapping. |
| **L** – Liskov Substitution | ✅ | All updaters use a common interface; decorators wrap any updater. |
| **I** – Interface Segregation | ✅ | Small, focused interface: `ItemUpdaterInterface`. |
| **D** – Dependency Inversion | ✅ | Factory returns abstractions; `ConjuredItemUpdater` depends on interface. |

---

## 📂 Project Structure
```bash
gilded-rose/
├── README.md
├── composer.json
├── composer.lock
├── grumphp.yml
├── phpcs.xml
├── phpunit.xml
├── rector.php
├── src
│   ├── Enums
│   │   ├── ItemNameEnum.php
│   │   └── TestLabelEnum.php
│   ├── Factory
│   │   └── ItemUpdaterFactory.php
│   ├── GildedRose.php
│   ├── Item.php
│   ├── ItemUpdater
│   │   ├── AgedBrieUpdater.php
│   │   ├── BackstagePassesUpdater.php
│   │   ├── ConjuredItemUpdater.php
│   │   ├── DefaultItemUpdater.php
│   │   ├── ElixirOfTheMongooseUpdater.php
│   │   ├── ItemUpdaterInterface.php
│   │   └── SulfurasUpdater.php
│   └── Traits
│       └── QualityBounded.php
└── tests
    ├── GildedRoseTest.php
    ├── Integration
    └── ItemUpdater
        ├── AgedBrieUpdaterTest.php
        ├── BackstagePassesUpdaterTest.php
        ├── ConjuredItemUpdaterTest.php
        ├── DefaultItemUpdaterTest.php
        ├── ElixirOfTheMongooseUpdaterTest.php
        └── SulfurasUpdaterTest.php
```

---

## 📖 Business Rules
- All items have a `sellIn` and `quality` value.
- Each day, both values update based on item rules.
- `Quality` never goes below 0 or above 50.
- "Aged Brie" increases in quality.
- "Backstage passes" increase by +1, +2, +3, then drop to 0.
- "Sulfuras" is legendary: never sold or changed.
- "Conjured" items degrade twice as fast.

---

## ✅ Benefits of This Refactor
- **Maintainability**: Logic is modular, testable, and scalable.
- **Testability**: Unit & integration tests for each component.
- **Extensibility**: Add new item types with minimal changes.
- **Clarity**: Logic reads like business rules — not condition soup.
- **SOLID Compliance**: Architecture reflects modern PHP standards.

---

**Built with ❤️ by [webkleur](https://github.com/webkleur)**
