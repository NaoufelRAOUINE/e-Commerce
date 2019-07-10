import { Product } from './product.service';
import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders, HttpRequest } from '@angular/common/http';
import { Observable } from 'rxjs/Observable';

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
    return this.http.get('http://ecommerce.local:80/produit');

  }
  createProduct(data): Observable<any> {
    console.log('data', data);
    const body = 'nom=' + data.nom + '&prix=' + data.prix + '&poids=' + data.poids;

    return this.http.post<any>('http://ecommerce.local:80/create_product',
    body
    // {body: data}
    // , { headers: new HttpHeaders({
    //   'Content-Type': 'application/json',
    //   // Accept: 'application/json',
    //   'Access-Control-Allow-Origin': '*',
    //   'Access-Control-Allow-Methods': 'GET, POST, OPTIONS, PUT, PATCH, DELETE',
    //   'Access-Control-Allow-Headers': 'origin, x-requested-with, content-type, Authorization'
    // })}
    );

  }
}
