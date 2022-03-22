import { ComponentFixture, TestBed } from '@angular/core/testing';

import { CasellaTestoComponent } from './casella-testo.component';

describe('CasellaTestoComponent', () => {
  let component: CasellaTestoComponent;
  let fixture: ComponentFixture<CasellaTestoComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ CasellaTestoComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(CasellaTestoComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
