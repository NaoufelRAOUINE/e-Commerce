import { Component, OnInit } from '@angular/core';
import { Product, ProductService } from '../product.service';
// import 'rxjs/Rx';

@Component({
  selector: 'app-product-list',
  templateUrl: './product-list.component.html',
  styleUrls: ['./product-list.component.css']
})
export class ProductListComponent implements OnInit {
  products: Product[];
  errorMessage: string;
  isLoading = true;
  constructor(private productService: ProductService) { }

  ngOnInit() {
    this.getProducts();
  }

  getProducts() {
    this.productService
      .getProducts()
      .subscribe(
        (res: Product[]) => {
          console.log('getproducts');
          this.products = res;
          this.isLoading = false;
        },
        error => this.errorMessage = error as any
      );
  }

}
