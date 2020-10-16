import { ComponentFixture, TestBed } from '@angular/core/testing';

import { WildlifePhotographerOfTheYearComponent } from './wildlife-photographer-of-the-year.component';

describe('WildlifePhotographerOfTheYearComponent', () => {
  let component: WildlifePhotographerOfTheYearComponent;
  let fixture: ComponentFixture<WildlifePhotographerOfTheYearComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ WildlifePhotographerOfTheYearComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(WildlifePhotographerOfTheYearComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
