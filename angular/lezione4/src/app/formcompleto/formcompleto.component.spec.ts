import { ComponentFixture, TestBed } from '@angular/core/testing';

import { FormcompletoComponent } from './formcompleto.component';

describe('FormcompletoComponent', () => {
  let component: FormcompletoComponent;
  let fixture: ComponentFixture<FormcompletoComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ FormcompletoComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(FormcompletoComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
