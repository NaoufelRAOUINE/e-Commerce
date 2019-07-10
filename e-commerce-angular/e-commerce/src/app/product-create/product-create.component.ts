import { Component, OnInit } from '@angular/core';
import { Injectable } from '@angular/core';
import { HttpClient, HttpErrorResponse, HttpHeaders, HttpRequest } from '@angular/common/http';
import { Product, ProductService } from '../product.service';
import { FormControl, FormGroup, Validators } from '@angular/forms';


@Component({
  selector: 'app-product-create',
  templateUrl: './product-create.component.html',
  styleUrls: ['./product-create.component.css']
})
export class ProductCreateComponent implements OnInit {


  someForm: FormGroup;
  constructor(private productService: ProductService) { }

  ngOnInit() {

    this.createForm();
  }

  private createForm() {
    this.someForm = new FormGroup({
      nom: new FormControl(''),
      prix: new FormControl(''),
      poids: new FormControl('')
    });
  }
  submitFunc() {
    this.productService.createProduct(this.someForm.value)
      .subscribe(
        (data) => {
          console.log('Form submitted successfully');
        },
        (error: HttpErrorResponse) => {
          console.log(error);
        }
      );
  }

}
