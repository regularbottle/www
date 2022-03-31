import {Component, OnInit} from '@angular/core';
import {FormBuilder, FormGroup, Validators} from "@angular/forms";

@Component({
  selector: 'app-formcompleto',
  templateUrl: './formcompleto.component.html',
  styleUrls: ['./formcompleto.component.css']
})
export class FormcompletoComponent implements OnInit {

  MioformGroup: FormGroup;

  constructor(private fb: FormBuilder) {
    this.MioformGroup = this.fb.group({
      firstName: ['', [Validators.required, Validators.minLength(3)]],
      lastName: ['', [Validators.required, Validators.minLength(3)]],
      age: [18, [Validators.required, Validators.min(13)]]
    })
  }

  ngOnInit(): void {
  }

}
