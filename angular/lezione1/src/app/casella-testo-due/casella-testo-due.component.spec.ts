import { ComponentFixture, TestBed } from '@angular/core/testing';

import { CasellaTestoDueComponent } from './casella-testo-due.component';

describe('CasellaTestoDueComponent', () => {
  let component: CasellaTestoDueComponent;
  let fixture: ComponentFixture<CasellaTestoDueComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ CasellaTestoDueComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(CasellaTestoDueComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
