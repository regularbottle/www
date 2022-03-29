import { ComponentFixture, TestBed } from '@angular/core/testing';

import { CommentoComponent } from './commento.component';

describe('CommentoComponent', () => {
  let component: CommentoComponent;
  let fixture: ComponentFixture<CommentoComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ CommentoComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(CommentoComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
