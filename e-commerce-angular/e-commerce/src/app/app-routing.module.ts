import { ProductCreateComponent } from './product-create/product-create.component';
import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { ProductListComponent} from './product-list/product-list.component';

const routes: Routes =
[
  { path: 'produit', component: ProductListComponent },
  { path: 'creer-produit', component: ProductCreateComponent }
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
