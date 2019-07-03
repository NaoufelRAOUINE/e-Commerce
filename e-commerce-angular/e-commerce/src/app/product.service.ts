import { Product } from './product.service';
import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders, HttpRequest } from '@angular/common/http';
import { Observable } from 'rxjs';
import { catchError, map } from 'rxjs/operators';

export interface Product {
  id: number;
  nom: string;
  prix: number;
  poids: number;
}
@Injectable({
  providedIn: 'root'
})
export class ProductService {
  constructor(private http: HttpClient) {
   }
  getProducts() {
    // const headers = new HttpHeaders({
    //   'Access-Control-Allow-Origin': '*',
    //   'Access-Control-Allow-Methods': 'GET, POST, OPTIONS, PUT, PATCH, DELETE',
    //   'Access-Control-Allow-Headers' : 'Content-Type'
    // });
// http://ecommerce.local:80, { headers}
    return this.http.get('http://ecommerce.local:80/produit');
    // ).subscribe((res: any[]) => {
    //   console.log(res);
    //   this.products = res;

  }
}
