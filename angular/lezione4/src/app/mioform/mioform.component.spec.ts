import { ComponentFixture, TestBed } from '@angular/core/testing';

import { MioformComponent } from './mioform.component';

describe('MioformComponent', () => {
  let component: MioformComponent;
  let fixture: ComponentFixture<MioformComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ MioformComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(MioformComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
