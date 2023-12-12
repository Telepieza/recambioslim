<?php
/**
  * Services.php
  * Description: Container Services by templates and table
  * @Author : M.V.M.
  * @Version 1.0.11
**/
declare(strict_types=1);

use App\Service\Category;
use App\Service\Category_description;
use App\Service\Language;
use App\Service\Manufacturer;
use App\Service\Geo_zone;
use App\Service\Country;
use App\Service\Location;
use App\Service\Zone;
use App\Service\Tax_class;
use App\Service\Tax_rate;
use App\Service\Tax_rule;
use App\Service\Customer;
use App\Service\Customer_activity;
use App\Service\Customer_approval;
use App\Service\Customer_group;
use App\Service\Customer_history;
use App\Service\Customer_ip;
use App\Service\Customer_login;
use App\Service\Customer_reward;
use App\Service\Customer_transaction;

use App\Service\Product;
use App\Service\Product_attribute;
use App\Service\Product_related;
use App\Service\Product_description;
use App\Service\Product_layout;
use App\Service\Product_reward;
use App\Service\Product_category;
use App\Service\Product_store;

use App\Service\Custom_field;

use App\Service\User;

use DI\ContainerBuilder;

return function (ContainerBuilder $containerBuilder) {
  $container = [];

  // Category
  $container['Category_find_service']   = static fn (): Category\Find  =>new Category\Find();
  $container['Category_create_service'] = static fn (): Category\Create=>new Category\Create();
  $container['Category_update_service'] = static fn (): Category\Update=>new Category\Update();
  $container['Category_delete_service'] = static fn (): Category\Delete=>new Category\Delete();
  // Category_description
  $container['Category_description_find_service']   = static fn (): Category_description\Find  =>new Category_description\Find();
  $container['Category_description_create_service'] = static fn (): Category_description\Create=>new Category_description\Create();
  $container['Category_description_update_service'] = static fn (): Category_description\Update=>new Category_description\Update();
  $container['Category_description_delete_service'] = static fn (): Category_description\Delete=>new Category_description\Delete();
  // Country
  $container['Country_find_service']   = static fn (): Country\Find  =>new Country\Find();
  $container['Country_create_service'] = static fn (): Country\Create=>new Country\Create();
  $container['Country_update_service'] = static fn (): Country\Update=>new Country\Update();
  $container['Country_delete_service'] = static fn (): Country\Delete=>new Country\Delete();
  // Geo_zone
  $container['Geo_zone_find_service']   = static fn (): Geo_zone\Find  =>new Geo_zone\Find();
  $container['Geo_zone_create_service'] = static fn (): Geo_zone\Create=>new Geo_zone\Create();
  $container['Geo_zone_update_service'] = static fn (): Geo_zone\Update=>new Geo_zone\Update();
  $container['Geo_zone_delete_service'] = static fn (): Geo_zone\Delete=>new Geo_zone\Delete();
  //Language
  $container['Language_find_service']   = static fn (): Language\Find  =>new Language\Find();
  $container['Language_create_service'] = static fn (): Language\Create=>new Language\Create();
  $container['Language_update_service'] = static fn (): Language\Update=>new Language\Update();
  $container['Language_delete_service'] = static fn (): Language\Delete=>new Language\Delete();
  // Location
  $container['Location_find_service']   = static fn (): Location\Find  =>new Location\Find();
  $container['Location_create_service'] = static fn (): Location\Create=>new Location\Create();
  $container['Location_update_service'] = static fn (): Location\Update=>new Location\Update();
  $container['Location_delete_service'] = static fn (): Location\Delete=>new Location\Delete();
  // Manufacturer
  $container['Manufacturer_find_service']   = static fn (): Manufacturer\Find  =>new Manufacturer\Find();
  $container['Manufacturer_create_service'] = static fn (): Manufacturer\Create=>new Manufacturer\Create();
  $container['Manufacturer_update_service'] = static fn (): Manufacturer\Update=>new Manufacturer\Update();
  $container['Manufacturer_delete_service'] = static fn (): Manufacturer\Delete=>new Manufacturer\Delete();
  // Zone
  $container['Zone_find_service']   = static fn (): Zone\Find  =>new Zone\Find();
  $container['Zone_create_service'] = static fn (): Zone\Create=>new Zone\Create();
  $container['Zone_update_service'] = static fn (): Zone\Update=>new Zone\Update();
  $container['Zone_delete_service'] = static fn (): Zone\Delete=>new Zone\Delete();
  // Tax_class
  $container['Tax_class_find_service']   = static fn (): Tax_class\Find  =>new Tax_class\Find();
  $container['Tax_class_create_service'] = static fn (): Tax_class\Create=>new Tax_class\Create();
  $container['Tax_class_update_service'] = static fn (): Tax_class\Update=>new Tax_class\Update();
  $container['Tax_class_delete_service'] = static fn (): Tax_class\Delete=>new Tax_class\Delete();
  //Tax_rate
  $container['Tax_rate_find_service']   = static fn (): Tax_rate\Find  =>new Tax_rate\Find();
  $container['Tax_rate_create_service'] = static fn (): Tax_rate\Create=>new Tax_rate\Create();
  $container['Tax_rate_update_service'] = static fn (): Tax_rate\Update=>new Tax_rate\Update();
  $container['Tax_rate_delete_service'] = static fn (): Tax_rate\Delete=>new Tax_rate\Delete();
  // Tax_rule
  $container['Tax_rule_find_service']   = static fn (): Tax_rule\Find  =>new Tax_rule\Find();
  $container['Tax_rule_create_service'] = static fn (): Tax_rule\Create=>new Tax_rule\Create();
  $container['Tax_rule_update_service'] = static fn (): Tax_rule\Update=>new Tax_rule\Update();
  $container['Tax_rule_delete_service'] = static fn (): Tax_rule\Delete=>new Tax_rule\Delete();
  // Customer
  $container['Customer_find_service']   = static fn (): Customer\Find  =>new Customer\Find();
  $container['Customer_create_service'] = static fn (): Customer\Create=>new Customer\Create();
  $container['Customer_update_service'] = static fn (): Customer\Update=>new Customer\Update();
  $container['Customer_delete_service'] = static fn (): Customer\Delete=>new Customer\Delete();
  // Customer_activity
  $container['Customer_activity_find_service']   = static fn (): Customer_activity\Find  =>new Customer_activity\Find();
  $container['Customer_activity_create_service'] = static fn (): Customer_activity\Create=>new Customer_activity\Create();
  $container['Customer_activity_update_service'] = static fn (): Customer_activity\Update=>new Customer_activity\Update();
  $container['Customer_activity_delete_service'] = static fn (): Customer_activity\Delete=>new Customer_activity\Delete();
  // Customer_approval
  $container['Customer_approval_find_service']   = static fn (): Customer_approval\Find  =>new Customer_approval\Find();
  $container['Customer_approval_create_service'] = static fn (): Customer_approval\Create=>new Customer_approval\Create();
  $container['Customer_approval_update_service'] = static fn (): Customer_approval\Update=>new Customer_approval\Update();
  $container['Customer_approval_delete_service'] = static fn (): Customer_approval\Delete=>new Customer_approval\Delete();
  // Customer_group
  $container['Customer_group_find_service']   = static fn (): Customer_group\Find  =>new Customer_group\Find();
  $container['Customer_group_create_service'] = static fn (): Customer_group\Create=>new Customer_group\Create();
  $container['Customer_group_update_service'] = static fn (): Customer_group\Update=>new Customer_group\Update();
  $container['Customer_group_delete_service'] = static fn (): Customer_group\Delete=>new Customer_group\Delete();
  // Customer_history
  $container['Customer_history_find_service']   = static fn (): Customer_history\Find  =>new Customer_history\Find();
  $container['Customer_history_create_service'] = static fn (): Customer_history\Create=>new Customer_history\Create();
  $container['Customer_history_update_service'] = static fn (): Customer_history\Update=>new Customer_history\Update();
  $container['Customer_history_delete_service'] = static fn (): Customer_history\Delete=>new Customer_history\Delete();
  // Customer_ip
  $container['Customer_ip_find_service']   = static fn (): Customer_ip\Find  =>new Customer_ip\Find();
  $container['Customer_ip_create_service'] = static fn (): Customer_ip\Create=>new Customer_ip\Create();
  $container['Customer_ip_update_service'] = static fn (): Customer_ip\Update=>new Customer_ip\Update();
  $container['Customer_ip_delete_service'] = static fn (): Customer_ip\Delete=>new Customer_ip\Delete();
  // Customer_login
  $container['Customer_login_find_service']   = static fn (): Customer_login\Find  =>new Customer_login\Find();
  $container['Customer_login_create_service'] = static fn (): Customer_login\Create=>new Customer_login\Create();
  $container['Customer_login_update_service'] = static fn (): Customer_login\Update=>new Customer_login\Update();
  $container['Customer_login_delete_service'] = static fn (): Customer_login\Delete=>new Customer_login\Delete();
  // Customer_reward
  $container['Customer_reward_find_service']   = static fn (): Customer_reward\Find  =>new Customer_reward\Find();
  $container['Customer_reward_create_service'] = static fn (): Customer_reward\Create=>new Customer_reward\Create();
  $container['Customer_reward_update_service'] = static fn (): Customer_reward\Update=>new Customer_reward\Update();
  $container['Customer_reward_delete_service'] = static fn (): Customer_reward\Delete=>new Customer_reward\Delete();
  // Customer_transaction
  $container['Customer_transaction_find_service']   = static fn (): Customer_transaction\Find  =>new Customer_transaction\Find();
  $container['Customer_transaction_create_service'] = static fn (): Customer_transaction\Create=>new Customer_transaction\Create();
  $container['Customer_transaction_update_service'] = static fn (): Customer_transaction\Update=>new Customer_transaction\Update();
  $container['Customer_transaction_delete_service'] = static fn (): Customer_transaction\Delete=>new Customer_transaction\Delete();
  // Custom_field
  $container['Custom_field_find_service']   = static fn (): Custom_field\Find  =>new Custom_field\Find();
  $container['Custom_field_create_service'] = static fn (): Custom_field\Create=>new Custom_field\Create();
  $container['Custom_field_update_service'] = static fn (): Custom_field\Update=>new Custom_field\Update();
  $container['Custom_field_delete_service'] = static fn (): Custom_field\Delete=>new Custom_field\Delete();
  // Product
  $container['Product_find_service']   = static fn (): Product\Find  =>new Product\Find();
  $container['Product_create_service'] = static fn (): Product\Create=>new Product\Create();
  $container['Product_update_service'] = static fn (): Product\Update=>new Product\Update();
  $container['Product_delete_service'] = static fn (): Product\Delete=>new Product\Delete();
  // Product_description
  $container['Product_description_find_service']   = static fn (): Product_description\Find  =>new Product_description\Find();
  $container['Product_description_create_service'] = static fn (): Product_description\Create=>new Product_description\Create();
  $container['Product_description_update_service'] = static fn (): Product_description\Update=>new Product_description\Update();
  $container['Product_description_delete_service'] = static fn (): Product_description\Delete=>new Product_description\Delete();
  // Product_attribute
  $container['Product_attribute_find_service']   = static fn (): Product_attribute\Find  =>new Product_attribute\Find();
  $container['Product_attribute_create_service'] = static fn (): Product_attribute\Create=>new Product_attribute\Create();
  $container['Product_attribute_update_service'] = static fn (): Product_attribute\Update=>new Product_attribute\Update();
  $container['Product_attribute_delete_service'] = static fn (): Product_attribute\Delete=>new Product_attribute\Delete();
  // Product_related
  $container['Product_related_find_service']   = static fn (): Product_related\Find  =>new Product_related\Find();
  $container['Product_related_create_service'] = static fn (): Product_related\Create=>new Product_related\Create();
  $container['Product_related_update_service'] = static fn (): Product_related\Update=>new Product_related\Update();
  $container['Product_related_delete_service'] = static fn (): Product_related\Delete=>new Product_related\Delete();
  // Product_layout
  $container['Product_layout_find_service']   = static fn (): Product_layout\Find  =>new Product_layout\Find();
  $container['Product_layout_create_service'] = static fn (): Product_layout\Create=>new Product_layout\Create();
  $container['Product_layout_update_service'] = static fn (): Product_layout\Update=>new Product_layout\Update();
  $container['Product_layout_delete_service'] = static fn (): Product_layout\Delete=>new Product_layout\Delete();
  // Product_category
  $container['Product_category_find_service']   = static fn (): Product_category\Find  =>new Product_category\Find();
  $container['Product_category_create_service'] = static fn (): Product_category\Create=>new Product_category\Create();
  $container['Product_category_update_service'] = static fn (): Product_category\Update=>new Product_category\Update();
  $container['Product_category_delete_service'] = static fn (): Product_category\Delete=>new Product_category\Delete();
  // Product_store
  $container['Product_store_find_service']   = static fn (): Product_store\Find  =>new Product_store\Find();
  $container['Product_store_create_service'] = static fn (): Product_store\Create=>new Product_store\Create();
  $container['Product_store_update_service'] = static fn (): Product_store\Update=>new Product_store\Update();
  $container['Product_store_delete_service'] = static fn (): Product_store\Delete=>new Product_store\Delete();
  // Product_reward
  $container['Product_reward_find_service']   = static fn (): Product_reward\Find  =>new Product_reward\Find();
  $container['Product_reward_create_service'] = static fn (): Product_reward\Create=>new Product_reward\Create();
  $container['Product_reward_update_service'] = static fn (): Product_reward\Update=>new Product_reward\Update();
  $container['Product_reward_delete_service'] = static fn (): Product_reward\Delete=>new Product_reward\Delete();

  // User
  // $container['user_find_service'] = static fn (): User\Find=>new User\Find();
  $container['user_login_service'] = static fn (): User\Login=>new User\Login();

  $containerBuilder->addDefinitions($container);

};