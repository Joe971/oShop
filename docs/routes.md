# Routes

## Sprint 1

| URL | Méthode HTTP | Controller | Méthode | Titre | Contenu | Commentaire |
|--|--|--|--|--|--|--|
| `/` | `GET` | `MainController` | `home` | Dans les shoe | 5 catégories | - |
| `/mentions-legales/`| `GET`| `MainController` | `legalMentions` | Legal Mentions | Legal Mentions | - |
| `/catalogue/categorie/[id]` | `GET` | `CatalogController` | `category` | #Name of the category# |  Products attached to the category | [id] represents the id of the category |
| `/catalogue/type/[id]` | `GET` | `CatalogController` | `type` | #Name of the type# |  Products attached to the type | [id] represents the id of the type |
| `/catalogue/marque/[id]` | `GET` | `CatalogController` | `brand` | #Name of the brand# | products attached to the brand  | [id] represents the id of the brand] |
| `/catalogue/produit/[id]` | `GET` | `CatalogController` | `product` | # Name of the Product #| Product details | (`[id]`) => represent the Product id |