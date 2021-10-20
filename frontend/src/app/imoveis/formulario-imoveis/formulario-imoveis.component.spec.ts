import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { FormularioImoveisComponent } from './formulario-imoveis.component';

describe('FormularioImoveisComponent', () => {
  let component: FormularioImoveisComponent;
  let fixture: ComponentFixture<FormularioImoveisComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ FormularioImoveisComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(FormularioImoveisComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
