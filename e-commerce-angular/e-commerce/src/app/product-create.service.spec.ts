import { TestBed } from '@angular/core/testing';

import { ProductCreateService } from './product-create.service';

describe('ProductCreateService', () => {
  beforeEach(() => TestBed.configureTestingModule({}));

  it('should be created', () => {
    const service: ProductCreateService = TestBed.get(ProductCreateService);
    expect(service).toBeTruthy();
  });
});
