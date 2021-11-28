export interface Product {
  entity_id: number;
  attribute_set_id: number;
  type_id: string;
  sku: string;
  has_options: number;
  required_options: number;
  created_at: Date;
  updated_at: Date;
  catalog_product_entity_varchars: CatalogProductEntityTextElement[];
  catalog_product_entity_ints: CatalogProductEntityDecimalElement[];
  catalog_product_entity_texts: CatalogProductEntityTextElement[];
  catalog_product_entity_decimals: CatalogProductEntityDecimalElement[];
}

export interface CatalogProductEntityDecimalElement {
  value_id: number;
  attribute_id: number;
  store_id: number;
  entity_id: number;
  value: number;
}

export interface CatalogProductEntityTextElement {
  value_id: number;
  attribute_id: number;
  store_id: number;
  entity_id: number;
  value: string;
}
